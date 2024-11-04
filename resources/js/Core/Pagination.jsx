import React from 'react';
import { Link } from '@inertiajs/react';

const PageLink = ({ active, label, url }) => {
 

  return (
    <li className={`page-item ${active ? 'active' : ''}`}>
        <Link className={`page-link`}  href={url}>
            <span dangerouslySetInnerHTML={{ __html: label }}></span>
       </Link>
    </li>
    
  );
};

// Previous, if on first page
// Next, if on last page
// and dots, if exists (...)
const PageInactive = ({ label }) => {
  // const className = classNames(
  //   'mr-1 mb-1 px-4 py-3 text-sm border rounded border-solid border-gray-300 text-gray'
  // );
  return (
    <li className='page-item disabled'>
      <div  className='page-link ' dangerouslySetInnerHTML={{ __html: label }} />
    </li>
  );
};

export default ({ links = [] }) => {
  // dont render, if there's only 1 page (previous, 1, next)
  if (links.length === 3) return null;
  return (
    <nav aria-label="Page navigation example">
      <ul className="pagination">
        {links.map(({ active, label, url }) => {
          return url === null ? (
            <PageInactive key={label} label={label} />
          ) : (
            
               <PageLink  className='page-link'  key={label} label={label} active={active} url={url} />
           
          );
        })}
      </ul>
  </nav>
  );
};
