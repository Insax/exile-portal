@php
    /** @var string $uid */
    /** @var string $name */
@endphp
<div>
    <a class="whitespace-no-wrap underline" href="{{ route('account.view', ['account' => $uid]) }}">{{ $name }}</a> ({{ $uid }})
</div>
