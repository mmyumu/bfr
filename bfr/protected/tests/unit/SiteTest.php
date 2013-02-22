<?php
class SiteTest extends CDbTestCase{
		public $fixtures=array(
				'users'=>':user',
		);

		public function testMail() {
			$user = $this->users['sample1'];
		}
}