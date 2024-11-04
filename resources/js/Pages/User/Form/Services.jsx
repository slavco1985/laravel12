import React, { useEffect, useState } from 'react';
import Input from '@/Components/Input';
import { useForm } from '@inertiajs/react';
import User from '@/Layouts/User';
import TabLink from './Shared/TabLink';
import { router } from '@inertiajs/react';
import Swal from 'sweetalert2';
import { Link } from '@inertiajs/react';
import Path from '../Shared/Path';


const Services = (props) =>{
    const [active, setActive] = useState('services');
    const [typ, setTyp] = useState('');
    const [lid, setLid] = useState(props.lid)
    const [services, setServices] = useState(props.services);
    const [edit, setEdit] = useState(-1);
    const [editname, setEditName] = useState('');

    const { data, setData, post, processing, errors, reset, clearErrors } = useForm({
        name: '',
        lid:props.lid
    });

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
        clearErrors(event.target.name);
    };

    const handleSubmiton = (e) =>{
        e.preventDefault();
        post(route('service.store'),{
            preserveState: (page) => Object.keys(page.props.errors).length,
        });
    }
    const handleEdit = i => () =>{
        setEdit(i);
        setEditName(services[i].name);
    }

    const handleSave = i => () =>{
        router.put(route('service.update', services[i].id),{name:editname,'lid':lid},{
            preserveState:false
        });
    }

    const handleDelete = i => () =>{
        Swal.fire({
            title: 'Are you sure want to Delete?',icon: 'warning',showCancelButton: true, confirmButtonText: 'Yes, delete!'
          }).then((result) => {
            if (result.isConfirmed) {
                router.delete(route('service.destroy', services[i].id),{
                    onSuccess: () => {
                        Swal.fire('Deleted!','Service Removed Sucessfully','success',);
                    },
                    preserveState:false
                });
            }
          })
    }

    return (
        <User>
            <Path title="Business Services" />
            <div className="container">
                <div className="row new-listing">
                    <div className="col-md-10 p-0 listing-col mx-auto">
                        <div className="card shadow text-center">
                            <div className="card-header p-0">
                                 <TabLink active={active} typ={typ} lid={lid}  />
                            </div>
                            <div className="card-body tab-content p-0">
                                <div className="form-container ">
                                    {
                                        errors.limit && 
                                            <div className="alert mb-4 alert-danger" role="alert">
                                                You reached your Maximum Limit 
                                                <Link className='fw-bolder text-decoration-underline' href={route('choos-package')}> Upgrade your plan </Link> 
                                                to add more
                                            </div>
                                    }

                                    <form onSubmit={handleSubmiton}>
                                        <div className="row form-row">
                                            <div className="col-md-4">
                                                <Input type='text' className={errors.name && 'inerror'} name="name" handleChange={onHandleChange} placeholder="Enter Service Name" />
                                                {errors.name &&  <div className="smart-valid">{errors.name}</div> }
                                            </div>
                                            <div className="col-md-2">
                                                <button disabled={processing} type='submit' className="btn btn-primary">Add Service</button>
                                            </div>
                                        </div>
                                    </form>
                                   

                                    <div className="row pb-1">
                                        {
                                            services && services.map((s, i)=>{
                                                return  <div key={i} className="col-md-4 mb-4">
                                                            <div className="service-cover justify-content-between d-flex shado-1 p-3">
                                                               {
                                                                   edit != i ? <h4 className='mb-0 text-truncate lh fs-6 text-start'>{ s.name }</h4> :
                                                                   <input type="text" onChange={(e)=>setEditName(e.target.value)} className='form-control mb-0' value={editname} />
                                                               } 
                                                               {
                                                                        edit != i ?
                                                                            <div style={{width:"45px"}} className="icons align-content-stretch cp">
                                                                                <i onClick={handleEdit(i)} className="bi pe-2 bi-pencil-square"></i>
                                                                                <i onClick={handleDelete(i)} className="bi bi-trash3"></i>
                                                                            </div>
                                                                        :
                                                                        <div className="icons d-flex flex-wrap align-items-center cp">
                                                                            <i onClick={handleSave(i)} className="bi ps-2 text-primary fs-5 bi-check-square"></i>
                                                                        </div>
                                                                }
                                                                
                                                            </div>
                                                        </div>
                                            })
                                        }
                                       
                                    </div>
                                    
                                </div>
                            </div>
                            <div className="card-footer text-muted">
                                    <div className="row">
                                        <div className="col-md-6 pt-2 left">
                                            <p>Step 4 of 7</p>
                                        </div>
                                        <div className="col-md-6 right">
                                            <Link href={route('user-dashboard')}>
                                                <button className="btn  btn-light">Skip and Go to Dashboard</button> 
                                            </Link>
                                           
                                        </div>
                                    </div>
                                
                                </div>
                        </div>
                    </div>
                </div>
            </div>
         </User>
    )
}
export default Services;