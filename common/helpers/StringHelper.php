<?php

namespace common\helpers;

class StringHelper extends \yii\helpers\StringHelper
{
	/**
	 * @param string $string
	 * @param int $length
	 * @param string $suffix
	 * @param null|string $encoding
	 * @param bool $asHtml
	 * @return string
	 */
	public static function smartTruncate($string, $length, $suffix = '...', $encoding = null, $asHtml = false)
	{
		if (mb_strlen($string) <= $length) {
			return $string;
		}

		$string = static::truncate($string, $length, $suffix, $encoding, $asHtml);

		$lasSpacePos = mb_strrpos($string, ' ');
		$string = rtrim(mb_substr($string, 0, $lasSpacePos)) . $suffix;

		return $string;
	}

	/**
	 * @param string $string
	 * @return string
	 */
	public static function spaceless($string)
	{
		return trim(preg_replace('/>\s+</', '><', $string));
	}

    /**
     * @param string $string
     * @param int $length
     * @return string
     */
    public static function hardTruncate($string, $length = 80)
    {
        if (mb_strlen($string) <= $length) {
            return $string;
        }

        return $string = substr($string, 0, $length).'...';
    }
}