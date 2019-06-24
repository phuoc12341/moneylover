import React, { Component } from 'react';
import HeaderMenu from './HeaderMenu';

class Header extends Component {
    constructor(props) {
        super(props);
        
    }
    
    render() {
        let listHeaderMenu = window.headerMenu;
        let listheaderMenu = listHeaderMenu.map((menu) => 
            <HeaderMenu menu={menu} key={menu.id}></HeaderMenu>
        );
        return (
            <div className="header">
                <div className="container">
                    <div className="row">
                        <div className="col-sm-12 firstHeader">
                            {typeof window.listSetting.first_logo !== 'undefined' &&
                                <img src={"storage/" + window.listSetting.first_logo} height="40px"/>
                            }
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
                            {typeof window.listSetting.not_first_logo !== 'undefined' &&
                                <img src={"storage/" + window.listSetting.not_first_logo} alt="" height="40px" />
                            }

                            <div className="mt-0 d-none d-sm-block float-right edit-label">
                                {listheaderMenu}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Header;