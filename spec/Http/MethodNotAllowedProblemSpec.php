<?php

declare(strict_types=1);

namespace spec\Phpro\ApiProblem\Http;

use Phpro\ApiProblem\Http\HttpApiProblem;
use Phpro\ApiProblem\Http\MethodNotAllowedProblem;
use PhpSpec\ObjectBehavior;

class MethodNotAllowedProblemSpec extends ObjectBehavior
{
    public function let(): void
    {
        $this->beConstructedWith('method not allowed');
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(MethodNotAllowedProblem::class);
    }

    public function it_is_an_http_api_problem(): void
    {
        $this->shouldHaveType(HttpApiProblem::class);
    }

    public function it_can_parse_to_array(): void
    {
        $this->toArray()->shouldBe([
            'status' => 405,
            'type' => HttpApiProblem::TYPE_HTTP_RFC,
            'title' => HttpApiProblem::getTitleForStatusCode(405),
            'detail' => 'method not allowed',
        ]);
    }
}
