{{-- quickMenu START --}}
    <div id="quickMenu">
        <div class="row">
            <div class="col-md-2 text-left">
                {{-- + - Button COLLAPSE --}}
                <a class="remoteButton" data-toggle="collapse" href="#collapseRemote" aria-expanded="false" aria-controls="collapseRemote">
                    <i id="remoteMenu" class="fa fa-minus-square-o" aria-hidden="true"></i>
                </a>
                {{-- PAGE-UP Button --}}
                <a class="remoteArrow" href="#"><i id="remoteUp" class="fa fa-arrow-up" aria-hidden="true"></i></a>
                {{-- PAGE-DOWN Button --}}
                <a class="remoteArrow" href="#"><i id="remoteDown" class="fa fa-arrow-down" aria-hidden="true"></i></a>
            </div>
            <div class="col-md-10 collapse in remote-button" id="collapseRemote">
                {{-- REMOTE TITLE & X Button --}}
                {{-- Novel TITLE --}}
                {{-- Novel EPISODSE MOVE --}}
                {{-- Viewer Settings --}}
                {{-- Novel BACKGROUND --}}
                <table class="table text-center">
                    <tr>
                        <th>
                            <strong>리모콘</strong>
                            <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" onchange="location = this.value;">
                                @for ($i = count($dataE); $i > 0; $i--)
                                    <option value="/novel/read/novel_read_view/{{$dataE[0]['novel_id']}}&{{$i}}">
                                        {{$i}}화. {!! $dataE[$i-1]['episode_title'] !!}
                                    </option>
                                @endfor
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td data-toggle="modal" data-target="#viewerModal">
                            <p class="remote">
                                <a class="setView" href="#">
                                    <i class="material-icons">settings</i>&nbsp;<span>뷰어설정</span>
                                </a>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td data-toggle="modal" data-target="#backgroundModal">
                            <p class="remote">
                                <a class="novelBackground" href="#">
                                    <i class="material-icons">remove_red_eye</i>&nbsp;<span>배경보기</span>
                                </a>
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    {{-- quickMenu END --}}