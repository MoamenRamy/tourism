<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CurrencyController extends Controller
{
    /**
     * عرض جميع العملات.
     */
    public function index()
    {
        $currencies = Currency::with('translations')->paginate(12);
        return view('currencies.index', compact('currencies'));
    }

    /**
     * عرض نموذج إنشاء عملة جديدة.
     */
    public function create()
    {
        return view('currencies.create');
    }

    /**
     * تخزين عملة جديدة في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|unique:currencies,code',
            'symbol' => 'required|string',
            'exchange_rate' => 'required|numeric',
            'translations' => 'required|array',
            'translations.*.locale' => 'required|string',
            'translations.*.name' => 'required|string',
        ]);

        $slug = Str::slug($validated['code']);

        $currency = Currency::create([
            'slug' => $slug,
            'code' => $validated['code'],
            'symbol' => $validated['symbol'],
            'exchange_rate' => $validated['exchange_rate'],
        ]);

        foreach ($validated['translations'] as $translation) {
            $currency->translateOrNew($translation['locale'])->name = $translation['name'];
        }
        $currency->save();

        return redirect()->route('currencies.index')->with('success', 'Currency created successfully');
    }

    /**
     * عرض تفاصيل عملة معينة.
     */
    public function show(Currency $currency)
    {
        return view('currencies.show', compact('currency'));
    }

    /**
     * عرض نموذج تعديل عملة موجودة.
     */
    public function edit(Currency $currency)
    {
        return view('currencies.edit', compact('currency'));
    }

    /**
     * تحديث بيانات عملة موجودة.
     */
    public function update(Request $request, Currency $currency)
    {
        $validated = $request->validate([
            'code' => 'sometimes|string|unique:currencies,code,' . $currency->id,
            'symbol' => 'sometimes|string',
            'exchange_rate' => 'sometimes|numeric',
            'translations' => 'sometimes|array',
            'translations.*.locale' => 'required_with:translations|string',
            'translations.*.name' => 'required_with:translations|string',
        ]);

        if (isset($validated['code'])) {
            $currency->slug = Str::slug($validated['code']);
            $currency->code = $validated['code'];
        }
        if (isset($validated['symbol'])) {
            $currency->symbol = $validated['symbol'];
        }
        if (isset($validated['exchange_rate'])) {
            $currency->exchange_rate = $validated['exchange_rate'];
        }
        $currency->save();

        if (isset($validated['translations'])) {
            foreach ($validated['translations'] as $translation) {
                $currency->translateOrNew($translation['locale'])->name = $translation['name'];
            }
            $currency->save();
        }

        return redirect()->route('currencies.index')->with('success', 'Currency updated successfully');
    }

    /**
     * حذف عملة معينة.
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();
        return redirect()->route('currencies.index')->with('success', 'Currency deleted successfully');
    }

    // admin

    public function adminIndex()
    {
        $currencies = Currency::with('translations')->get();
        return view('admin.currencies.index', compact('currencies'));
    }
}
