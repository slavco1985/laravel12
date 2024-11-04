import React, { useEffect } from 'react';
import { router } from '@inertiajs/react';

const TabLink = ({active, typ, lid}) =>{
    const handleLink  = link => () =>{
        typ != 'add' && router.visit(link);
    }
    return (
        <ul className="nav nav-pills nav-fill">
            <li  onClick={handleLink(route('listing.edit', lid !== undefined ? lid : ''))} className="nav-item">
                <a  className={`nav-link disabled ${active == 'basic' ? "active" : ""}` } >Basic Details</a>
            </li>
            <li  className="nav-item">
                <a onClick={handleLink(route('add-business-logo', lid !== undefined ? lid : ''))} className={`nav-link  ${active == 'logo' ? "active" : ""}` } >Add Logo</a>
            </li>
            <li  className="nav-item">
                <a onClick={handleLink(route('busines-detail.show', lid !== undefined ? lid : ''))} className={`nav-link  ${active == 'business' ? "active" : ""}` } >About </a>
            </li>
            <li  className="nav-item">
                <a onClick={handleLink(route('service.show', lid !== undefined ? lid : ''))} className={`nav-link  ${active == 'services' ? "active" : ""}` } >Services</a>
            </li>
            <li  className="nav-item">
                <a onClick={handleLink(route('product.show', lid !== undefined ? lid : ''))} className={`nav-link  ${active == 'products' ? "active" : ""}` } >Products</a>
            </li>
            <li  className="nav-item">
                <a onClick={handleLink(route('gallery.show', lid !== undefined ? lid : ''))} className={`nav-link  ${active == 'gallery' ? "active" : ""}` } >Gallery</a>
            </li>
            <li  className="nav-item">
                <a onClick={handleLink(route('timing.show', lid !== undefined ? lid : ''))} className={`nav-link  ${active == 'timing' ? "active" : ""}` } >Extra Detail</a>
            </li>
        </ul>
    )
}
export default TabLink