<?php
/**
 * @package     Joomla.UnitTest
 * @subpackage  Archive
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

require_once __DIR__ . '/JArchiveTestCase.php';

/**
 * Test class for JArchiveGzip.
 * Generated by PHPUnit on 2011-10-26 at 19:34:32.
 *
 * @package     Joomla.UnitTest
 * @subpackage  Archive
 * @since       11.1
 */
class JArchiveGzipTest extends JArchiveTestCase
{
	/**
     * @var  JArchiveGzip
     */
	protected $object;

	/**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
	 *
	 * @return  void
     */
	protected function setUp()
	{
		parent::setUp();

		$this->object = new JArchiveGzip;
	}

	/**
	 * Tests the extract Method.
	 *
	 * @return  void
	 */
	public function testExtract()
	{
		if (!JArchiveGzip::isSupported())
		{
			$this->markTestSkipped('Gzip files can not be extracted.');
		}

		$this->object->extract(__DIR__ . '/logo-gz.png.gz', $this->outputPath . '/logo-gz.png');
		$this->assertTrue(is_file($this->outputPath . '/logo-gz.png'));
	}

	/**
	 * Tests the extract Method.
	 *
	 * @return  void
	 */
	public function testExtractWithStreams()
	{
		if (!JArchiveGzip::isSupported())
		{
			$this->markTestSkipped('Gzip files can not be extracted.');
		}

		$this->object->extract(__DIR__ . '/logo-gz.png.gz', $this->outputPath . '/logo-gz.png', array('use_streams' => true));
		$this->assertTrue(is_file($this->outputPath . '/logo-gz.png'));
	}

	/**
	 * Tests the isSupported Method.
	 *
	 * @return  void
	 */
	public function testIsSupported()
	{
		$this->assertEquals(
			extension_loaded('zlib'),
			JArchiveGzip::isSupported()
		);
	}
}
