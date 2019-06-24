import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Header from './Header'; 
import LanguageModal from './LanguageModal';
import SlideIndicator from './SlideIndicator';
import ListSocial from './ListSocial';
import EnVideo from './EnVideo';
import ListSlide from './slides/ListSlide';

class App extends Component {
    render() {
        return (
            <div>
                <Header></Header>
                <LanguageModal></LanguageModal>
                <SlideIndicator></SlideIndicator>
                <ListSocial></ListSocial>
                <EnVideo></EnVideo>
                <ListSlide></ListSlide>
            </div>
        );
    }
}

export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
