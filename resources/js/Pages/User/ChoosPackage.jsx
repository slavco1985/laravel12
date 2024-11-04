import React from 'react';
import User from '@/Layouts/User';
import Path from './Shared/Path';
import { Link, usePage } from '@inertiajs/react';


const ChoosPackage = (props) =>{

    const pack = props.package;
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

    // const choosPack = i => () =>{
    //     if(pack[i].price <= 0){
    //         Inertia.post('add-package', {'id':pack[i].id});
    //     }
        
    // }
     
    
    


    return (
        <User>
            <Path title="Packages" />
            <div className="container-fluid user-container">
                <div className="container pb-5">
                    <div className="title text-center pt-0 pb-4">
                        <h2 className='fs-4 pb-2'>Choose the right Package for you to get Started</h2>
                    </div>
                    <div className="row">
                        {
                            pack  && pack.map((p, i)=>{
                                return <div key={i} className="col-md-4">
                                            <div className="card pricecard  rounded border-0 text-center">
                                                <div className="card-header">
                                                    <h6 className=''>{ p.name }</h6>
                                                    <p>{ p.desic }</p>
                                                    <h4 className='mb-0'>{currency}{ parseFloat(p.price).toFixed(2)  }</h4>
                                                </div>
                                                <div className="card-body">
                                                    <ul>
                                                        <li>Total No of Listings <span> - &nbsp; { p.listing }</span></li>
                                                        <li>Verified Badge <span> - &nbsp; { p.verification }</span></li>
                                                        <li>Messages from Visitors <span> - &nbsp; { p.message } </span></li>
                                                        <li>Accept Reviews <span> - &nbsp; { p.review }</span></li>
                                                        <li>No of Services Allowed / Listing <span> - &nbsp; { p.services }</span></li>
                                                        <li>No of Products Allowed / Listing <span> - &nbsp; { p.products }</span></li>
                                                        <li>No of Images Allowed / Listing <span> - &nbsp; { p.images }</span></li>
                                                        <li>Package Validity <span> - &nbsp; <FilterValidity validity={p.validity} /></span></li>
                                                    </ul>
                                                </div>
                                                <div className="card-footer text-muted">
                                                    <Link className='btn w-100 btn-primary'  method="post" data={{'id':p.id}} href='purchase' as="button">
                                                        Choose Package
                                                    </Link>
                                                    
                                                </div>
                                            </div>
                                        </div>
                            })
                        }
                    </div>
                </div>
            </div>
        </User>
    )
}
export default ChoosPackage
