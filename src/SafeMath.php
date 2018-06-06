<?php

namespace NewOne\Math;

use InvalidArgumentException;

class SafeMath
{
    /**
     * 加法
     */
    public static function add($self, $other, $scale = 18)
    {
        $self = SafeMath::format($self, $scale);
        $other = SafeMath::format($other, $scale);
        return bcadd($self, $other, $scale);
    }

    /**
     * 减法
     */
    public static function sub($self, $other, $scale = 18)
    {
        $self = SafeMath::format($self, $scale);
        $other = SafeMath::format($other, $scale);
        return bcsub($self, $other, $scale);
    }

    /**
     * 乘法
     */
    public static function mul($self, $other, $scale = 18)
    {
        $self = SafeMath::format($self, $scale);
        $other = SafeMath::format($other, $scale);
        return bcmul($self, $other, $scale);
    }

    /**
     * 除法
     */
    public static function div($self, $other, $scale = 18)
    {
        $self = SafeMath::format($self, $scale);
        $other = SafeMath::format($other, $scale);
        return bcdiv($self, $other, $scale);
    }

    /**
     * 乘方
     */
    public static function pow($self, $other, $scale = 18)
    {
        $self = SafeMath::format($self, $scale);
        $other = SafeMath::format($other, $scale);
        return bcpow($self, $other, $scale);
    }

    /**
     * 大于
     */
    public static function gt($self, $other, $scale = 18)
    {
        return SafeMath::cmp($self, $other, $scale) > 0;
    }

    /**
     * 大于等于
     */
    public static function gte($self, $other, $scale = 18)
    {
        return SafeMath::cmp($self, $other, $scale) >= 0;
    }

    /**
     * 小于
     */
    public static function lt($self, $other, $scale = 18)
    {
        return SafeMath::cmp($self, $other, $scale) < 0;
    }

    /**
     * 小于等于
     */
    public static function lte($self, $other, $scale = 18)
    {
        return SafeMath::cmp($self, $other, $scale) <= 0;
    }

    /**
     * 比较
     */
    public static function cmp($self, $other, $scale = 18)
    {
        $self = SafeMath::format($self, $scale);
        $other = SafeMath::format($other, $scale);
        return bccomp($self, $other, $scale);
    }

    /**
     * 格式化数据，如果是科学计数法则进行转换
     */
    public static function format($value, $scale)
    {
        $split = preg_split("/(e[+-])|e/i", $value, 0);

        switch (count($split)) {
            case 1:
                return $value;
            case 2:
                $base = $split[0];
                $times = SafeMath::pow(10, $split[1], $scale);
                return stripos($value, '-')
                    ? SafeMath::div($base, $times, $scale)
                    : SafeMath::mul($base, $times, $scale);
            default:
                throw new InvalidArgumentException("Invalid Argument {$value}", 1);
        }
    }
}
