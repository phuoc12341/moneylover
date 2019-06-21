import React, { Component } from 'react';

class App extends Component {
    render() {
        return (
            <div className="header">
                <div className="container">
                <div className="row">
                    <div className="col-sm-12 firstHeader">
                    @isset($listSetting-&gt;first_logo)
                    <img src="storage/{{$listSetting->first_logo}}" height="40px" />
                    @endisset
                    <div className="dropdown float-right d-none d-lg-block" id="languege">
                        <button className="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        English
                        </button>
                        <div className="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a className="dropdown-item" href="#">English</a>
                        <a className="dropdown-item" href="#">Tiếng việt</a>
                        </div>
                    </div>
                    <button className="btn languege-for-mobile d-block d-lg-none float-right" type="button" data-toggle="modal" data-target="#languageModal">English <span className="caret" />
                    </button>
                    </div>
                    <div className="col-sm-12 notFirstHeader">
                    @isset($listSetting-&gt;not_first_logo)
                    <img src="storage/{{$listSetting->not_first_logo}}" alt height="40px" />
                    @endisset
                    <div className="mt-0 d-none d-sm-block float-right edit-label">
                        @isset($headerMenu)
                        @foreach($headerMenu as $menu)
                        @php
                        $baseCurrentURL = Request::url();
                        $isCurrentPage = strpos($menu-&gt;link, $baseCurrentURL);
                        if ($isCurrentPage === 0) {'{'}
                        $isCurrentPage = true;
                        {'}'}
                        @endphp
                        <a href="{{ $menu->link }}" @if (!$iscurrentpage) target="_blank" @endif (!$loop->last)
                        class="btn btn-primary btn-lg mr-3"
                        @else
                        class="btn btn-primary btn-lg"
                        @endif
                        &gt;{'{'}{'{'} $menu-&gt;name {'}'}{'}'}</a>
                        @endforeach
                        @endisset
                    </div>
                    </div>
                </div>
                </div>
            </div>
        );
    }
}

export default App;
