<?php

declare(strict_types=1);

namespace spec\Phpro\ApiProblem\Http;

use Phpro\ApiProblem\Http\HttpApiProblem;
use Phpro\ApiProblem\Http\NotModifiedProblem;
use PhpSpec\ObjectBehavior;

class NotModifiedProblemSpec extends ObjectBehavior
{
    public function let(): void
    {
        $this->beConstructedWith('not modified');
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(NotModifiedProblem::class);
    }

    public function it_is_an_http_api_problem(): void
    {
        $this->shouldHaveType(HttpApiProblem::class);
    }

    public function it_can_parse_to_array(): void
    {
        $this->toArray()->shouldBe([
            'status' => 304,
            'type' => HttpApiProblem::TYPE_HTTP_RFC,
            'title' => HttpApiProblem::getTitleForStatusCode(304),
            'detail' => 'not modified',
        ]);
    }
}
