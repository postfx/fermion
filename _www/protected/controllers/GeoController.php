<?php

class GeoController extends Controller
{
	public function actionRegions()
	{
		$country_id = Yii::app()->request->getQuery('country_id', 0);
		$regions = BglGeoRegion::model()->findAllByAttributes(array(
			'countryid' => $country_id,
		));

		print(json_encode(CHtml::listData($regions, 'id', 'name')));
		Yii::app()->end();
	}

	public function actionCities()
	{
		$region_id = Yii::app()->request->getQuery('region_id', 0);
		$cities = BglGeoCity::model()->findAllByAttributes(array(
			'regionid' => $region_id,
		));

		print(json_encode(CHtml::listData($cities, 'id', 'name')));
		Yii::app()->end();
	}
}