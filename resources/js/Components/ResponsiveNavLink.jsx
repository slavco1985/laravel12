import React from 'react';
import { Link, usePage } from '@inertiajs/react';

export default function ResponsiveNavLink({ icon, text, link, className ='', id="", active, children }) {
    const { url, component } = usePage()
    if(children !== undefined){
        return (
            <>
                <li className={`child  ${className} ${component.startsWith(active) ? 'act' : ''}`} data-bs-toggle='collapse' data-bs-target={`#${id}`} aria-expanded="true"> 
                    <i className={icon}></i><span> {text}</span><i className="bi bi-chevron-down rit-ico"></i>
                </li>
                <div id={id} className={`inner-nav collapse ${component.startsWith(active) ? 'show' : 'collapse'} `}>
                    <ul  className="innmwnu">
                        {children && children}
                    </ul>
                </div>
          </>
        );
    }else{
        return (
            <li className={`${className} ${component.startsWith(active) ? 'act' : ''}`}> 
                <Link href={link}> <i className={icon}></i><span> {text}</span></Link>
                {children && children}
            </li>
        );
    }
    
}
