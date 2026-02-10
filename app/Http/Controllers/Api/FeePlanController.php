<?php

namespace App\Http\Controllers\Api;

use App\Domain\Billing\Models\FeePlan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeePlanController extends Controller
{
    public function index(): mixed
    {
        return FeePlan::paginate(25);
    }

    public function store(Request $request): FeePlan
    {
        $data = $request->validate([
            'institute_id' => ['required', 'integer'],
            'type' => ['required', 'string'],
            'amount' => ['required', 'numeric'],
            'currency' => ['required', 'string'],
            'rules_json' => ['nullable', 'array'],
        ]);

        return FeePlan::create($data);
    }

    public function show(FeePlan $feePlan): FeePlan
    {
        return $feePlan;
    }

    public function update(Request $request, FeePlan $feePlan): FeePlan
    {
        $data = $request->validate([
            'type' => ['sometimes', 'string'],
            'amount' => ['sometimes', 'numeric'],
            'currency' => ['sometimes', 'string'],
            'rules_json' => ['nullable', 'array'],
        ]);

        $feePlan->update($data);

        return $feePlan;
    }

    public function destroy(FeePlan $feePlan): array
    {
        $feePlan->delete();

        return ['status' => 'deleted'];
    }
}
