import React, { Component } from 'react';
import axios from 'axios';
import { slide as Menu } from 'react-burger-menu'


class MenuWrapper extends Component {

    constructor(props) {
        super(props)
        this.state = {

        }
    }

    componentDidMount() {
        axios.get( 'http://localhost/index.php/wp-json/WP_React/menu/2' )
            .then(res => {
                this.setState({ 'menu': res.data });
            })
    }

    render() {
        return(
            <div id="outer-container">
                <Menu pageWrapId={ "page-wrap" } outerContainerId={ "outer-container" } />
                <main id="page-wrap">...
                    <a id="home" className="menu-item" href="/">Home</a>
                    <a id="about" className="menu-item" href="/about">About</a>
                    <a id="contact" className="menu-item" href="/contact">Contact</a>
                    <a onClick={ this.showSettings } className="menu-item--small" href="">Settings</a>
                </main>
            </div>
        )
    }
}

class MenuItem extends Component {
    showSettings (event) {
        event.preventDefault();
    }

    render () {
        return (
            <Menu>
                <a id="home" className="menu-item" href="/">Home</a>
                <a id="about" className="menu-item" href="/about">About</a>
                <a id="contact" className="menu-item" href="/contact">Contact</a>
                <a onClick={ this.showSettings } className="menu-item--small" href="">Settings</a>
            </Menu>
        );
    }
}

export default MenuWrapper;