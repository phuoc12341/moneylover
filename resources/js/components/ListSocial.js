import React, { Component } from 'react';

class ListSocial extends Component {

    render() {
        
        let listSocial = window.listSocial;
        let listElementSocial = listSocial.map((social) => 
            <li className="animated fadeInLeft" key={social.id}><a href={ social.url } target="_blank"><i className={social.icon}></i></a></li>
        );

        return (
            <div className="listSocial d-none d-lg-block">
                <ol>
                    {listElementSocial}
                </ol>
            </div>
        );
    }
}

export default ListSocial;
