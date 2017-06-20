{{-- Viewer Setting Modal START --}}
    <div class="modal fade" id="viewerModal" tabindex="-1" role="dialog" aria-labelledby="backgroundModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="viewerModalLabel"><i class="material-icons">settings</i>&nbsp;<span>뷰어 설정</span></h4>
                </div>
                <div class="modal-body">
                    {{-- Screen MODE --}}
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2 text-left">
                                <h5><strong>화면 모드</strong></h5>
                            </div>
                            <div class="col-md-7 text-left">
                                {{-- 50px x 50px 화면 모드 이미지 버튼 2개 --}}
                                <ul class="list-inline">
                                    <li class="viewScreen webMode viewOn">
                                        {{-- WEB MODE --}}
                                    </li>
                                    {{-- <li class="viewScreen bookMode viewOff"> --}}
                                        {{-- E-Book MODE --}}
                                    {{-- </li> --}}
                                </ul>
                            </div>
                            <div class="col-md-3 text-right">
                                <button type="button" class="btn btn-default" name="reset"><i class="material-icons">settings_backup_restore</i>원래대로</button>
                            </div>
                        </div>
                    </div>
                    {{-- Setting --}}
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 text-left">
                                <h5><strong>열람 설정</strong></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 example-text">
                                여인은 초저녁부터 목이 아픈 줄도 모르고 줄창 소리를 뽑아대고, 사내는 그 여인의 소리로 하여 끊임없이 어떤 예감 같은 것을 견디고 있는 듯한 표정으로 북장단을 잡고 있었다. 
                                소리를 쉬지 않는 여인이나, 묵묵히 장단 가락만 잡고 있는 사내나 양쪽 다 이마에 힘든 땀방울이 솟고 있었다.
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 text-left">
                                <h5><strong>글꼴</strong></h5>
                                <ul class="list-group">
                                    <li class="list-group-item fontList on-font" value="NanumGothic">나눔고딕</li>
                                    <li class="list-group-item fontList off-font" value="Jeju Myeongjo">제주명조</li>
                                    <li class="list-group-item fontList off-font" value="Hanna">한나</li>
                                    {{-- <li class="list-group-item fontList off-font" value="Gungsuh">궁서</li> --}}
                                </ul>
                            </div>
                            <div class="col-md-3 text-left">
                                <h5><strong>글크기</strong></h5>
                            <ul class="list-group">
                                    <li class="list-group-item sizeList off-font">12px</li>
                                    <li class="list-group-item sizeList on-font">14px</li>
                                    <li class="list-group-item sizeList off-font">16px</li>
                                    <li class="list-group-item sizeList off-font">18px</li>
                                    <li class="list-group-item sizeList off-font">20px</li>
                                    <li class="list-group-item sizeList off-font">26px</li>
                                </ul>
                            </div>
                            <div class="col-md-3 text-left">
                                <h5><strong>줄간격</strong></h5>
                                <ul class="list-group">
                                    <li class="list-group-item lineList off-font">120%</li>
                                    <li class="list-group-item lineList off-font">150%</li>
                                    <li class="list-group-item lineList off-font">160%</li>
                                    <li class="list-group-item lineList on-font">170%</li>
                                    <li class="list-group-item lineList off-font">180%</li>
                                    <li class="list-group-item lineList off-font">200%</li>
                                </ul>
                            </div>
                            <div class="col-md-3 text-left">
                                <h5><strong>글씨색</strong></h5>
                                <ul class="list-inline">
                                    <li class="colorBox on-colorBox font-color" value="#000000">{{-- 색1 검정 --}}</li>
                                    <li class="colorBox off-colorBox font-color" value="#ffffff">{{-- 색5 흰색 --}}</li>
                                </ul>
                                <h5><strong>배경색</strong></h5>
                                <ul class="list-inline">
                                    <li class="colorBox on-colorBox back-color" value="#ffffff">{{-- 색1 흰색 --}}</li>
                                    <li class="colorBox off-colorBox back-color" value="#ffd480">{{-- rgb(255, 212, 128) --}}</h5></li>
                                    <li class="colorBox off-colorBox back-color" value="#e6ffe6">{{-- rgb(230, 255, 230) --}}</li>
                                    <li class="colorBox off-colorBox back-color" value="#e0ccff">{{-- rgb(224, 204, 255) --}}</li>
                                    <li class="colorBox off-colorBox back-color" value="#000000">{{-- 색5 검정 --}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            {{-- modal-content END --}}
        </div>
        {{-- modal-dialog END --}}
    </div>
    {{-- Viewer Setting Modal END --}}