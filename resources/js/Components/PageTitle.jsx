import React, { useState, useContext } from 'react';
import { Link } from '@inertiajs/react';


const PageTitle = (props) =>{
    return (
        <div className="page-title row no-margin">
            <h4>{ props.title }</h4>
            <ul>
                <li><Link href={route('dashboard')}><i className="bi m-0 bi-house-door-fill"></i> Home <i className="bi  bi-arrow-right"></i></Link></li>
                {
                    props.path &&   <li><Link href={props.pathurl && route(props.pathurl)}>{ props.path } <i className="bi bi-arrow-right"></i></Link></li>
                }
               
                <li>{ props.title }</li>
            </ul>
        </div> 
    )
}
export default PageTitle