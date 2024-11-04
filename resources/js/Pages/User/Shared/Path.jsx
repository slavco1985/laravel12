import React, { useEffect } from 'react';
import { Link } from '@inertiajs/react';

const Path = ({title}) =>{
    return (
        <div className="nav-container user-page-nav container-fluid">
            <div className="container">
                <div className="row">
                    <ul className="path">
                        <li><a href={route('/')}>Home  <i className="bi bi-arrow-right-short"></i></a></li>
                        <li><Link href={route('user-dashboard')}>My Account <i className="bi bi-arrow-right-short"></i></Link></li>
                        <li> {title}</li>
                    </ul>
                </div>
            </div>
        </div>
    )
}
export default Path