
<div class="modal fade" tabindex="-1" id="{{$name}}" data-backdrop="static" data-keyboard="false"  aria-labelledby="modalStatisticLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$title}}</h5>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-dismiss="modal" aria-label="Close">
                    <span>X</span>
                </div>
            </div>
            <div class="modal-body">
                {{$slot}}
            </div>
        </div>
    </div>
</div>
