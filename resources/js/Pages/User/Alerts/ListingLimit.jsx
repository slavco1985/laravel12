import React from 'react';
import User from '@/Layouts/User';
import Path from '../Shared/Path';
import { Link } from '@inertiajs/react';


const ListingLimit = () =>{
    return (
        <User>
            <Path title="Listing Limit Reached" />
            <div className="container-fluid auth-container pt-5 pb-5 mb-5">
                <div className="container mb-4 pt-4">
                    <div className="col-lg-6 col-md-10 mx-auto shadow authcard">
                        <div className="titlecover alert-user">
                            <i className="bi text-danger bi-exclamation-triangle"></i>
                            <h2 className='text-danger fs-4'>Maximum Listing Limit Reached !</h2>
                            <p className='mt-3'>You reached your maximum listing Limit. To add more Listings please Upgrade your Current Plan</p>
                            <Link href={route('choos-package')}>
                                <button className="btn btn-primary ps-5 pe-5 mt-4 fw-bolder">Click to Upgrade</button>
                            </Link>
                            
                        </div>
                    </div>
                </div>
            </div>
        </User>
    )
}
export default ListingLimit