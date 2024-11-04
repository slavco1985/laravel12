import React, { useEffect } from 'react';
import { Link,usePage } from '@inertiajs/react';

const ListCard = ({uid, list, removeListing}) =>{

    const { url, component } = usePage()
    const removeHandeler = id => () =>{
        removeListing(id);
    }

    return (
        <div className="row shadow-sm list-row border rounded">
            <div className="col-lg-4 pe-0 img-col">
                <a href={ route('view', list.url) }>
                    <img className="rounded" src={list.image} alt="" />
                </a>
            </div>
                <div className="col-lg-8 detail-col">
                    <a href={ route('view', list.url) }>
                        <div className="bofy-col">
                            <h2 className="text-truncate">{ list.business_name }</h2>
                            <p className="text-truncate">{ list.description }</p>
                            <ul className='row ms-1'>
                                <li className='col-md-4'><i className="bi bi-telephone"></i> { list.mobile }</li>
                                <li className='col-md-8'><i className="bi bi-envelope"></i> { list.email }</li>

                            </ul>
                            <ul className='row ms-1'>
                                <li className='col-md-4'> <i className="bi bi-map "></i> { list.city }</li>
                                <li className='col-md-8'><p className='text-truncate'><i className="bi bi-geo-alt text-truncate"></i> { list.address }</p></li>
                            </ul>
                        </div>
                    </a>
                
                        <div className="footcover pe-0">
                            <ul>
                                <li className="rev"> 
                                    {(list.rating >= 1) ? <i className="bi act bi-star-fill"></i> : <i className="bi  bi-star-fill"></i> }
                                    {(list.rating >= 2) ? <i className="bi act bi-star-fill"></i> : <i className="bi  bi-star-fill"></i> }
                                    {(list.rating >= 3) ? <i className="bi act bi-star-fill"></i> : <i className="bi  bi-star-fill"></i> }
                                    {(list.rating >= 4) ? <i className="bi act bi-star-fill"></i> : <i className="bi  bi-star-fill"></i> }
                                    {(list.rating >= 5) ? <i className="bi act bi-star-fill"></i> : <i className="bi  bi-star-fill"></i> }

                                    <small> {list.rating}  ({list.rcount} Reviews)</small>
                                </li>

                                <li className="actionlist">

                                {
                                    component !== 'User/Bookmarks' ? 
                                        <span>
                                            <button onClick={removeHandeler(list.id)} type="button" className="btn btn-sm btn-danger"><i className="bi bi-trash3"></i> Delete</button>
                                            <Link href={route('listing.edit', list.id)}>
                                            <button className="btn btn-primary btn-sm"><i className="bi bi-pencil-square"></i> Edit</button>
                                            </Link>
                                        
                                        </span>
                                    :
                                    <button onClick={removeHandeler(list.id)} type="button" className="btn btn-sm btn-danger"><i className="bi bi-trash3"></i> Remove</button>
                                    
                                }

                                </li>

                            </ul>
                        </div>
               
            </div>
        </div>
    )
}
export default ListCard