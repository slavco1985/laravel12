import React, { useEffect, useState } from 'react';
import { Link, useForm, usePage } from '@inertiajs/react';
import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import Swal from 'sweetalert2'



const Manage = (props) =>{

    const { delete: destroy } = useForm();
    const [pack, setPack] = useState(props.packages);
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

    const removePackage = i => () =>{
        Swal.fire({
            title: 'Are you sure want to Delete?',icon: 'warning',showCancelButton: true, confirmButtonText: 'Yes, delete!'
          }).then((result) => {
            if (result.isConfirmed) {
                destroy(route('package.destroy', pack[i].id),{
                    onSuccess: () => {
                        pack.splice(i, 1);
                        setPack(Array.from(pack));
                        Swal.fire('Deleted!','Package Removed Sucessfully','success');
                    }
                });
            }
          })
    }
    
    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="Manage Packages" path="Package" pathurl="" />
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
                                        <ul>
                                            <li><Link href={route('package.edit', p.id)}><i className="bi bi-pencil-square"></i> Edit</Link></li>
                                            <li onClick={removePackage(i)}><i className="bi bi-trash3"></i> Delete</li>
                                        </ul>
                                        </div>
                                    </div>
                                </div>
                    })
                }
                
            </div>
        </Authenticated>

    )
}
export default Manage