<?php

namespace FedexRest\Services\Ship\Entity;

class ShippingChargesPayment
{
    public ?string $paymentType;
    public ?PayorResponsibleParty $payorResponsibleParty;
    /**
     * @param string  $paymentType
     * @return $this
     */
    public function setPaymentType(string $paymentType): ShippingChargesPayment
    {
        $this->paymentType = $paymentType;
        return $this;
    }

    public function setPayorResponsibleParty(?PayorResponsibleParty $payorResponsibleParty): ShippingChargesPayment
    {
        $this->payorResponsibleParty = $payorResponsibleParty;
        return $this;
    }

    public function prepare(): array
    {
        $data = [];
        if (!empty($this->paymentType)) {
            $data['paymentType'] = $this->paymentType;
        }
        if (!empty($this->payorResponsibleParty)) {
            $data['payor'] = [
                'responsibleParty' => $this->payorResponsibleParty->prepare(),
            ];
        }
        return $data;
    }
}
