import React, { useState, useEffect } from 'react';
import User from '@/Layouts/User';
import UserMenu from '@/Layouts/UserMenu';
import Path from './Shared/Path';
import Pagination from '@/Core/Pagination';
import Swal from 'sweetalert2';
import { router } from '@inertiajs/react';

const UserMessages = (props) =>{
    const [message, setMessage] = useState(props.message.data);
    const [links, setLinks] = useState(props.message.links);

    const removeMessage = id => () =>{
        Swal.fire({
            title: 'Are you sure want to Delete?',icon: 'warning',showCancelButton: true, confirmButtonText: 'Yes, delete!'
          }).then((result) => {
            if (result.isConfirmed) {
                router.delete(route('message.destroy', id),{
                    onSuccess: () => {
                        setMessage((ps)=>{
                            return ps.filter(loc => loc.id != id);
                        })
                        Swal.fire('Deleted!','Message Removed Successfully','success');
                    },
                    preserveState:true
                });
            }
        })
    }

    return (
        <User>
           <Path title="Messages" />
                <div className="container-fluid user-container">
                    <div className="container">
                        <div className="row">
                            <div className="col-md-3">
                                <UserMenu user={props.auth.user} />
                            </div>
                            
                            <div className="col-md-9">
                                <table className='table bg-white side-card mb-0'>
                                    <tbody >
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email Address</th>
                                            <th>Message</th>
                                            <th>Action</th>
                                        </tr>
                                        {
                                            message && message.map((m, i)=>{
                                                return <tr key={i}>
                                                            <td>{i + props.message.from}</td>
                                                            <td>{ m.name }</td>
                                                            <td>{ m.mobile }</td>
                                                            <td>{ m.email }</td>
                                                            <td>{ m.message } </td>
                                                            <td>
                                                                <button onClick={removeMessage(m.id)} className="btn btn-sm btn-xs btn-danger">
                                                                    <i className="bi font-weight-bold bi-trash"></i> Delete
                                                                </button>
                                                            </td>
                                                        </tr>
                                            })
                                        }
                                    </tbody>
                                </table>
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
export default UserMessages