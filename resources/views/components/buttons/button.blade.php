@props([
    'type',
    'name',
    'href'
])
<a  href="{{$href}}" type="button" class="btn btn-{{$type}}" style="margin-bottom: 20px;">{{$name}}</a>
