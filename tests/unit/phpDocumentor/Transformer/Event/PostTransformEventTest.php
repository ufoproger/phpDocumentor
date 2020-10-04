<?php

declare(strict_types=1);

/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link https://phpdoc.org
 */

namespace phpDocumentor\Transformer\Event;

use phpDocumentor\Descriptor\ProjectDescriptor;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * @coversDefaultClass \phpDocumentor\Transformer\Event\PostTransformEvent
 * @covers ::__construct
 */
final class PostTransformEventTest extends TestCase
{
    /** @var PostTransformEvent $fixture */
    private $fixture;

    /**
     * Creates a new (empty) fixture object.
     */
    protected function setUp() : void
    {
        $this->fixture = new PostTransformEvent(new stdClass());
    }

    /**
     * @covers ::createInstance
     * @covers ::getSubject
     */
    public function testCreatingAnInstance() : void
    {
        $subject = new stdClass();
        $this->fixture = PostTransformEvent::createInstance($subject);
        $this->assertSame($subject, $this->fixture->getSubject());
    }

    /**
     * @covers ::getProject
     * @covers ::setProject
     */
    public function testSetAndGetProject() : void
    {
        $project = $this->prophesize(ProjectDescriptor::class);
        $this->assertNull($this->fixture->getProject());

        $this->fixture->setProject($project->reveal());

        $this->assertSame($project->reveal(), $this->fixture->getProject());
    }
}
