<?php

namespace FedexRest\Services\Ship\Entity;

use FedexRest\Entity\Address;

class PayorResponsibleParty
{
    public function __construct(
        public ?string $accountNumber = null,
        public ?Address $address = null,
    ) {}

    public function setAccountNumber(string $accountNumber): static
    {
        $this->accountNumber = $accountNumber;
        return $this;
    }

    public function setAddress(?Address $address): static
    {
        $this->address = $address;
        return $this;
    }

    public function prepare(): array
    {
        $data = [];
        if (!empty($this->accountNumber)) {
            #$data['accountNumber'] = $this->accountNumber;
            $data['accountNumber'] = [
                'value' => $this->accountNumber,
            ];
        }
        if (!empty($this->address)) {
            $data['address'] = $this->address->prepare();
        }
        return $data;
    }
}
