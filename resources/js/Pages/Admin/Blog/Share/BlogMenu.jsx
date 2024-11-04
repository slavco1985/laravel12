import React, { useEffect } from 'react';
import { Link } from '@inertiajs/react';


const BlogMenu = ({active, bid}) =>{
    if(bid != ''){
        return (
       
            <ul className="nav nav-pills nav-fill">
                <li  className="nav-item border">
                    <Link  className={`nav-link text-secondary ${active == 'add' ? "active" : ""}`} href={route('blog.edit', bid)}>Edit Blog</Link>
                </li>
                <li  className="nav-item">
                    <Link  className={`nav-link text-secondary ${active == 'image' ? "active" : ""}`}  href={route('admin/blog-image', bid)}>Blog Image</Link>
                </li>
                <li  className="nav-item">
                    <Link  className={`nav-link text-secondary ${active == 'detail' ? "active" : ""}`} href={route('admin/blog-detail', bid)} >Blog Detail</Link>
                </li> 
            </ul>
        )      
    }else{
        return (
       
            <ul className="nav nav-pills nav-fill">
                <li  className="nav-item border">
                    <a  className={`nav-link disabled ${active == 'add' ? "active" : ""}` } >Add Blog</a>
                </li>
                <li  className="nav-item">
                    <a  className={`nav-link disabled text-secondary  ${active == 'image' ? "active" : ""}` } >Blog Image</a>
                </li>
                <li  className="nav-item">
                    <a  className={`nav-link disabled text-secondary  ${active == 'detail' ? "active" : ""}` } >Blog Detail</a>
                </li>
            </ul>
        )
    }
   
}
export default BlogMenu