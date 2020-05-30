
@if( Auth::user()->status == 1 )
<a style="" href="#">The Document is now forwarded to the QA </a>
@endif

@if( Auth::user()->status == 2 )
    <a style="" href="#">Your file has been submitted</a>
@endif