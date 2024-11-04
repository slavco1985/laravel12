import React, { useState } from 'react';
import User from '@/Layouts/User';
import UserMenu from '@/Layouts/UserMenu';
import Path from './Shared/Path';
import Pagination from '@/Core/Pagination';
import { useForm } from '@inertiajs/react'
import Swal from 'sweetalert2';

const Reviews = (props) =>{

    const [review, setReview] = useState(props.review.data);
    const [links, setLinks] = useState(props.review.links);
    const [edit, setEdit] = useState(-1);

    const { data, setData, put, processing, errors, delete: destroy } = useForm({
        message: '',
    })

    const editReview = i => () =>{
        setData('message', review[i].message);
        setEdit(i);
    }

    const saveReview = id => () =>{
       
        put(route('rating.update', id),{
            onSuccess: () => {
                let oldreview = review;
                
                oldreview.forEach((old) => {
                    if(old.id == id){
                        old.message = data.message;
                    }
                })
                setReview(oldreview);
                Swal.fire('Updated!','Review Updated Successfully','success');
            }
        });
        setEdit(-1);
    }

    const deleteReview = id => () =>{
        Swal.fire({
            title: 'Are you sure want to Delete?',icon: 'warning',showCancelButton: true, confirmButtonText: 'Yes, delete!'
          }).then((result) => {
            if (result.isConfirmed) {
                destroy(route('rating.destroy', id),{
                    onSuccess: () => {
                        setReview((ps)=>{
                            return ps.filter(loc => loc.id != id);
                        })
                        Swal.fire('Deleted!','Review Removed Successfully','success');
                    },
                    preserveState:true
                });
            }
        })
    }

    return (
        <User>
           <Path title="Reviews" />
                <div className="container-fluid user-container">
                        <div className="container">
                            <div className="row">
                                <div className="col-md-3">
                                    <UserMenu user={props.auth.user} />
                                </div>
                                
                                <div className="col-md-9">
                                    {
                                        review && review.map((r, i)=>{
                                            return  <div key={i} className="reiview no-margin bg-white py-3 mb-3 side-card row">
                                                        <div className="business">
                                                            <h4 className='fs-5 mb-1'>{ r.business }</h4>
                                                        </div>
                                                        <div className="row  mb-1">
                                                            <div className="rev pt-0 col-md-6">
                                                                <i className={`${r.rating >= 1 && 'act'} pe-1 s-6 bi bi-star-fill`}></i>
                                                                <i className={`${r.rating >= 2 && 'act'} bi pe-1 bi-star-fill`}></i>
                                                                <i className={`${r.rating >= 3 && 'act'} bi  pe-1 bi-star-fill`}></i>
                                                                <i className={`${r.rating >= 4 && 'act'} bi pe-1 bi-star-fill`}></i>
                                                                <i className={`${r.rating >= 5 && 'act'} bi pe-1 bi-star-fill`}></i>
                                                            </div>
                                                            <div className="col-md-6 text-end">
                                                                <li className='cp'>
                                                                    {
                                                                        edit != i ?
                                                                            <span onClick={editReview(i)}><i  className="bi bi-pencil-square"></i> Edit</span>
                                                                        :
                                                                            <span onClick={saveReview(r.id)}><i className="bi bi-check2-square"></i> Save</span>

                                                                    }
                                                                    
                                                                    <span onClick={deleteReview(r.id)}> <i className="bi ps-3 bi-trash"></i> Delete </span>
                                                                </li>
                                                            </div>
                                                            
                                                        </div>
                                                        <div className="msgtxt">
                                                            {
                                                                edit != i ?
                                                                    <p>{ r.message }</p>
                                                                :
                                                                    <textarea onChange={e => setData('message', e.target.value)} value={data.message}  className='form-control mb-0 mt-1'></textarea>
                                                            }
                                                        </div>
                                                        
                                                        
                                                    </div>
                                        })
                                    }
                                    { 
                                        links.length === 3 ? '' :
                                            <div className="card-footer">
                                                <div className="row">
                                                    <div className="col-md-6 pt-2">
                                                        
                                                    </div>
                                                    <div className="col-md-6 d-flex justify-content-end">
                                                        <Pagination links={links} />
                                                    </div>
                                                </div>
                                                
                                            </div>
                                    }
                                </div>
                            </div>
                            
                        </div>
                </div>
        </User>
        
    )
}
export default Reviews