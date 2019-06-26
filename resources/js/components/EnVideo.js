import React, { Component } from 'react';

class EnVideo extends Component {
    render() {
        return (
            <div id="video">
                <div>
                    {typeof window.listSlide[1].value.url_youtube !== 'undefined' &&
                        <iframe className="animated zoomIn" width="640" height="360" src={window.listSlide[1].value.url_youtube} frameBorder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowFullScreen></iframe>
                    }
                </div>
                <button className="close">
                    <span className="iconclosevideo"></span>
                </button>
            </div>
        );
    }
}

export default EnVideo;
