<?php

namespace Dream\Apply\Client\Models;

class TransactionCollection extends Collection
{
    use CollectionPlugins\CollectionOfCreatable;

    /**
     * @param float|string $amount (decimal)
     * @param string $currency
     * @throws \Dream\Apply\Client\Exceptions\BaseException
     */
    public function create($amount, $currency)
    {
        /** @var Transaction $transaction */
        $transaction = $this->doCreate([
            'amount' => $amount,
            'currency' => $currency,
        ]);

        return $transaction;
    }
}
