import React, { Component } from 'react';

class SlideIndicator extends Component {
    render() {
        return (
            <div className="slide-indicators animated fadeIn d-none d-lg-block">
                <ol>
                <li data-slide-to={0} className="active" />
                <li data-slide-to={1} />
                <li data-slide-to={2} />
                <li data-slide-to={3} />
                <li data-slide-to={4} />
                <li data-slide-to={5} />
                <li data-slide-to={6} />
                </ol>
            </div>
        );
    }
}

export default SlideIndicator;