import React, { Component } from 'react';

class LanguageModal extends Component {
    render() {
        return (
            <div className="modal fade" id="languageModal" tabIndex={-1} role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div className="modal-dialog modal-sm languageModal col-12">
                <div className="modal-content  animated flipInX">
                    <div className="control">
                    <input type="radio" name="inlineRadioOptions" defaultChecked="checked" /> 
                    <a href="true">
                        <label>English</label>
                    </a>
                    <img src="images/flag_en.png" alt="nglish" height="24px" className="pull-right" />
                    </div>
                    <div className="control">
                    <input type="radio" name="inlineRadioOptions" />
                    <a href="true">
                        <label>Tiếng Việt</label>
                    </a>
                    <img src="images/flag_vi.png" alt="nglish" height="24px" className="pull-right" />
                    </div>
                </div>
                </div>
            </div>
        );
    }
}

export default LanguageModal;