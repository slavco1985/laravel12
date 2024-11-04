import React, { useEffect, useState } from 'react';
import User from '@/Layouts/User';
import UserMenu from '@/Layouts/UserMenu';
import Path from './Shared/Path';
import { Link, usePage } from '@inertiajs/react';



const Plan = (props) =>{

    const [pack, setPack] = useState(props.pack);
    const [expery, setExpery] = useState(props.expery);
    const { currency } = usePage().props

    const FilterValidity = ({validity}) =>{
        if(validity == 0){
             return <span>Lifetime</span>
        }else if(validity >= 12){
             return <span>{validity/12} Years</span>
        }else{
         return <span>{validity} Months</span>
        }
         
     }


    return (
        <User>
           <Path title="Plan Details" />
                <div className="container-fluid user-container">
                        <div className="container">
                            <div className="row">
                                <div className="col-md-3">
                                    <UserMenu user={props.auth.user} />
                                </div>
                                
                                <div className="col-md-9">
                                    {
                                        pack.listing && <div className="col-md-7 mx-auto">
                                                <div className="card pricecard  rounded border-0 text-center">
                                                    <div className="card-header d-flex ps-3 pe-3 justify-content-between">
                                                        <h6 className='fs-5 mb-0'>{ pack.name }</h6>
                                                        <h4 className='mt-0 fs-5 mb-0'>{currency}{ parseFloat(pack.price).toFixed(2)  }</h4>
                                                    </div>
                                                    <div className="card-body">
                                                        <ul>
                                                            <li>Total No of Listings <span> - &nbsp; { pack.listing }</span></li>
                                                            <li>Verified Badge <span> - &nbsp; { pack.verification }</span></li>
                                                            <li>Messages from Visitors <span> - &nbsp; { pack.message } </span></li>
                                                            <li>Accept Reviews <span> - &nbsp; { pack.review }</span></li>
                                                            <li>No of Services Allowed / Listing <span> - &nbsp; { pack.services }</span></li>
                                                            <li>No of Products Allowed / Listing <span> - &nbsp; { pack.products }</span></li>
                                                            <li>No of Images Allowed / Listing <span> - &nbsp; { pack.images }</span></li>
                                                            <li>Package Validity <span> - &nbsp; <FilterValidity validity={pack.validity} /></span></li>
                                                            <li>Expiry  Date <span> - &nbsp; {expery}</span></li>
                                                        </ul>
                                                    </div>
                                                    <div className="card-footer text-muted">
                                                        <Link className='btn w-100 btn-primary'  href={route('choos-package')}  as="button">
                                                            Change Package
                                                        </Link>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                    }

                                    {
                                        !pack.listing && <div className='center col-md-6 mx-auto pt-5 mt-5'>
                                            <p className='border-primary'>You Don't Have an Active Plan
                                                <b >
                                                    <Link href={route('choos-package')}> Choose a Package</Link></b>
                                                </p>
                                        </div>
                                    }                                    
                                </div>
                            </div>
                            
                        </div>
                </div>
        </User>
        
    )
}
export default Plan