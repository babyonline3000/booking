<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\Rooms]].
 *
 * @see \common\models\Rooms
 */
class Rooms extends \yii\db\ActiveQuery
{
	/**
	 * {@inheritdoc}
	 * @return \common\models\Rooms[]|array
	 */
	public function all($db = null)
	{
		return parent::all($db);
	}

	/**
	 * {@inheritdoc}
	 * @return \common\models\Rooms|array|null
	 */
	public function one($db = null)
	{
		return parent::one($db);
	}
}
