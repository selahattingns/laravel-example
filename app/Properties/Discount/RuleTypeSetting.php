<?php
namespace App\Properties\Discount;

use App\Models\OrderDiscount;
use App\Models\Rule;
use App\Models\RuleType;

class RuleTypeSetting {
    /**
     * @var
     */
    protected $model;
    /**
     * @var string
     */
    protected $type = "";
    /**
     * @var string
     */
    protected $description = "";

    /**
     * @return void
     */
    public function firstOrCreateForTypeTable()
    {
        RuleType::firstOrCreate([
            "type" => $this->type
        ],[
            "description" => $this->description,
        ]);
    }

    /**
     * @return array
     */
    public function getRules()
    {
        $ruleType = $this->getRuleType();
        return $ruleType ? Rule::where('rule_type_id',$ruleType->id)->get() : [];
    }

    /**
     * @return mixed
     */
    public function getRuleType()
    {
        return RuleType::where('type', $this->type)->first();
    }

    /**
     * @param $orderId
     * @param $ruleId
     * @return void
     */
    public function ruleDefinition($orderId, $ruleId)
    {
        OrderDiscount::firstOrCreate([
            "order_id" => $orderId,
            "rule_id" => $ruleId
        ]);
    }
}
