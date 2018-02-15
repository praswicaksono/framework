<?php
declare(strict_types=1);


namespace Illuminate\Tests\Filesystem;

use Illuminate\Container\Container;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Filesystem\FilesystemManager;
use PHPUnit\Framework\TestCase;

class FilesystemManagerTest extends TestCase
{
    /**
     * @var Container
     */
    private $app;

    public function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        $this->app = new Container();
    }

    /**
     * @test
     */
    public function testCreateLocalDriverViaDisk()
    {
        $this->app['config'] = [
            'filesystems.disks.local' => [
                'root' => '.'
            ]
        ];

        $manager = new FilesystemManager($this->app);

        $driver = $manager->disk('local');

        $this->assertInstanceOf(FilesystemAdapter::class, $driver);
    }

    /**
     * @test
     */
    public function testCreateLocalDriverViaDriver()
    {
        $this->app['config'] = [
            'filesystems.disks.local' => [
                'root' => '.'
            ]
        ];

        $manager = new FilesystemManager($this->app);

        $driver = $manager->driver('local');

        $this->assertInstanceOf(FilesystemAdapter::class, $driver);
    }
}
