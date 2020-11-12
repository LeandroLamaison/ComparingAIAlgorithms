<?php

namespace Rubix\ML\Transformers;

interface Transformer
{
    /**
     * Return the data types that this transformer is compatible with.
     *
     * @return list<\Rubix\ML\DataType>
     */
    public function compatibility() : array;

    /**
     * Transform the dataset in place.
     *
     * @param array[] $samples
     */
    public function transform(array &$samples) : void;

    /**
     * Return the string representation of the object.
     *
     * @return string
     */
    public function __toString() : string;
}
