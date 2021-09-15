<?php
/**
 * Created by PhpStorm.
 * @author: svd22286@gmail.com
 * @date: 15.09.2021
 * @time: 08:26
 *
 */
namespace common\components;

/**
 * class OrderedList Provides functionality for working with an ordered set
 * Implements a fluent interface
 *
 * usage:
 * ```php
 * $list = new OrderedList($list);
 * $result = $list->first(5)->offset(1)->getList();
 * ```
 */
class OrderedList
{
    protected array $list;

    public function __construct(array $list)
    {
        $this->list = $list;
    }

    public function getList(): array
    {
        return $this->list;
    }

    /**
     * Selects last $num ordered elements
     *
     * @param int $num
     * @return $this
     */
    public function last(int $num): self
    {
        rsort($this->list);
        $this->list = array_slice($this->list, 0, $num);
        return $this;
    }

    /**
     * Selects first $num ordered elements
     *
     * @param int $num
     * @return $this
     */
    public function first(int $num): self
    {
        sort($this->list);
        $this->list = array_slice($this->list, 0, $num);
        return $this;
    }

    /**
     * Shifts the list by $num elements
     *
     * @param int $num
     * @return $this
     */
    public function offset(int $num): self
    {
        $this->list = array_slice($this->list, $num);
        return $this;
    }
}