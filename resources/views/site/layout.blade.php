@include('site.header')
@include('site.menu')


@isset($b_page)
@include('site.breadcrumb')
@endisset


@yield('content')
@include('site.footer')