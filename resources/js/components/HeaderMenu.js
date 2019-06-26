import React, { Component } from 'react';

class HeaderMenu extends Component {
    constructor(props) {
        super(props);
        
    }
    
    render() {
        let base_url = window.location.origin;
        let isCurrentPage = (this.props.menu.link).indexOf(base_url);
        let target = "";
        if (!isCurrentPage) {
            target="_blank"
        }
        
        return (
            <a href={this.props.menu.link} className="btn btn-primary btn-lg mr-3" target={target}>
                {this.props.menu.name}
            </a>
        );
    }
}

export default HeaderMenu;