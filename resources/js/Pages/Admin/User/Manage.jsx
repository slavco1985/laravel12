import React, { useEffect, useState } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import Panel from '@/Components/Panel';
import Pagination from '@/Core/Pagination';
import Swal from 'sweetalert2';
import { router } from '@inertiajs/react';
import pickBy from 'lodash/pickBy';
import { usePrevious } from '@/Core/Previous';

const Manage = (props) =>{

    const [pack, setPack] = useState(props.package);
    const [users, setUser] = useState(props.users.data);
    const [activepage, setActivePage] = useState('');
    const [links, setLinks] = useState(props.users.links);


    const [values, setValues] = useState({
        pack:  '',
        key:  ''
    });

    const prevValues = usePrevious(values);

    useEffect(() => {
        if (prevValues) {
            const query = Object.keys(pickBy(values)).length ? pickBy(values) : { remember: 'forget' };
            router.get(route(route().current()), query, {
                replace: true,
                preserveState: true
            });
        }
    }, [values]);


    useEffect(()=>{
        if(props.update != 'noupdate'){
            setUser(props.users.data);
            setLinks(props.users.links);
        }
        
        props.users.links && props.users.links.map((l)=>{
            if(l.active){
                //setData('page', l.label);
                setActivePage(parseInt(l.label));
            }
        })
        
        
    },[props.users])

    function handleChange(e) {
        const key = e.target.name;
        const value = e.target.value;
    
        setValues(values => ({
          ...values,
          [key]: value
        }));
    }

    const removeUser = id => () =>{
        Swal.fire({
            title: 'Are you sure want to Delete?',icon: 'warning',showCancelButton: true, confirmButtonText: 'Yes, delete!'
          }).then((result) => {
            if (result.isConfirmed) {
                router.delete(route('remove-user', id),{
                    onSuccess: () => {
                        setUser((ps)=>{
                            return ps.filter(loc => loc.id != id);
                        })
                        Swal.fire('Deleted!','User Removed Successfully','success');
                    },
                    preserveState:true
                });
            }
        })
    }

    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="Manage Users" path="Users" pathurl="" />
            <Panel title="Manage Users" md="12">
                <div className="row pt-2 pb-2 form-group m-0">
                    <div className="col-md-3 pe-1">

                    </div>
                    <div className="col-md-3 pe-1">
                        
                    </div>
                    <div className="col-md-3 pe-1">
                        <select onChange={handleChange} value={values.pack} className='form-control' name="pack" id="">
                            <option value="">Filter by Package</option>
                            {
                                pack && pack.map((p, i)=>{
                                    return <option key={i} value={p.id}>{p.name}</option>
                                })
                            }
                        </select>
                    </div>
                    <div className="col-md-3 pe-1">
                        <input type="text" onChange={handleChange} value={values.key} placeholder='Search User' name='key' className='form-control' />
                    </div>
                </div>
                <div className="table-responsive-md">
                    <table className='table mb-0 '>
                        <tbody>
                            <tr>
                                <th className='slno text-center'>ID</th>
                                <th>Image</th>
                                <th>User Name</th>
                                <th>Email Address</th>
                                <th className='text-center'>Mobile Number</th>
                                <th className='center'>Active Plan</th>
                                <th className='text-center'>Action</th>
                            </tr>
                            {
                                users && users.map((u, i)=>{
                                    return <tr key={i}>
                                        <td className='text-center'>{ u.id }</td>
                                        <td><img className='rounded' style={{width:'40px'}} src="./../../assets/admin/images/person.jpg" alt="" /></td>
                                        <td>{u.name}</td>
                                        <td>{u.email}</td>
                                        <td className='text-center'>{u.mobile}</td>
                                        <td className='text-center'>{u.plan}</td>
                                        <td className='text-center'>
                                            <button disabled={u.role == 'admin'} onClick={removeUser(u.id)} className="btn btn-danger me-2 btn-xs"><i className="bi bi-trash3"></i> Delete</button>
                                        </td>
                                    </tr>
                                })
                            }
                        </tbody>
                    </table>
                </div>
               
                { links.length === 3 ? '' :
                   <div className="card-footer">
                        <div className="row">
                            <div className="col-md-6 pt-2">
                                
                            </div>
                            <div className="col-md-6">
                                <Pagination links={links} />
                            </div>
                        </div>
                        
                    </div>
                }
            </Panel>
        </Authenticated>
    )
}
export default Manage