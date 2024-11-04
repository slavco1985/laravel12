import React, {  useState } from 'react';
import { Link, useForm } from '@inertiajs/react';
import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import Panel from '@/Components/Panel';
import ListCount from '@/Helper/ListCount';
import Currency from '@/Helper/Currency';
import Swal from 'sweetalert2';

const AppSettings = (props) =>{
    const settings = props.settings;
    const { data, setData, post, put, processing, errors, clearErrors, reset } = useForm({
        email_activation: settings.email_activation,
        currency: settings.currency,
        currency_type: settings.currency_type,
        messsage_notification: settings.messsage_notification,
        review_notification: settings.review_notification,
        list_view: settings.list_view,
        grid_view: settings.grid_view,
        blog: settings.blog,
        featured_list: settings.featured_list,
        latest_list: settings.latest_list
    })

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
        clearErrors(event.target.name);
    }

    const saveSettings = (e) =>{
        e.preventDefault();
        post(route('app-settings.store'),{
            onSuccess: () =>{
                Swal.fire('Saved Sucessfully !', '', 'success')
            }
        })
    }

    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="App Settings" path="Settings" pathurl=""  />
            <Panel title="App Settings" lg="7" md="8">
                <form className='p-4' onSubmit={saveSettings} >
                    <div className="form-group  row">
                        <div className="col-sm-7">
                            <label htmlFor="">Email Activation Manditory for User Login</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-5 pt-2">
                            <div className="">
                                <div className="form-check form-switch">
                                    <input className="form-check-input" onChange={(e)=>onHandleChange(e)} checked={data.email_activation} name="email_activation" type="checkbox" role="switch" id="flexSwitchCheckDefault1"/>
                                </div>
                            </div>
                        </div>
                    </div>

                   

                    <div className="form-group  row">
                        <div className="col-sm-7">
                            <label htmlFor="">Select Currency</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-5 ">
                           <Currency name="currency" value={data.currency} onHandleChange={onHandleChange} />
                        </div>
                    </div>

                    <div className="form-group  row">
                        <div className="col-sm-7">
                            <label htmlFor="">Currency Type</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-5">
                            <select name="currency_type" value={data.currency_type} onChange={(e)=>onHandleChange(e)} className='form-control'>
                                <option value="Symbol">Symbol</option>
                                <option value="Code">Code</option>
                            </select>
                        </div>
                    </div>

                    <div className="form-group  row">
                        <div className="col-sm-7">
                            <label htmlFor="">Enable Notification for User Messages</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-5 pt-2">
                            <div className="">
                                <div className="form-check form-switch">
                                    <input className="form-check-input" name='messsage_notification' onChange={(e)=>onHandleChange(e)} checked={data.messsage_notification} type="checkbox" role="switch" id="flexSwitchCheckDefault"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="form-group  row">
                        <div className="col-sm-7">
                            <label htmlFor="">Enable Notification for User Review</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-5 pt-2">
                            <div className="">
                                <div className="form-check form-switch">
                                    <input name='review_notification' className="form-check-input" onChange={(e)=>onHandleChange(e)} checked={data.review_notification} type="checkbox" role="switch" id="flexSwitchCheckDefault"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="form-group  row">
                        <div className="col-sm-7">
                            <label htmlFor="">No of Listings / Page in List View</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-5">
                            <ListCount name="list_view" max="30" value={data.list_view} onHandleChange={onHandleChange}   />
                        </div>
                    </div>

                    <div className="form-group  row">
                        <div className="col-sm-7">
                            <label htmlFor="">No of Listings / Page in Grid View</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-5">
                            <ListCount name="grid_view" max="30" value={data.grid_view} onHandleChange={onHandleChange}   />
                        </div>
                    </div>

                    <div className="form-group  row">
                        <div className="col-sm-7">
                            <label htmlFor="">No of Blogs Posts / Page</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-5">
                            <ListCount name="blog" max="30" value={data.blog} onHandleChange={onHandleChange}   />
                        </div>
                    </div>

                    <div className="form-group  row">
                        <div className="col-sm-7">
                            <label htmlFor="">No of Featured Listings in Home Page</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-5">
                            <ListCount name="featured_list" max="6" value={data.featured_list} onHandleChange={onHandleChange}   />
                        </div>
                    </div>

                    <div className="form-group  row">
                        <div className="col-sm-7">
                            <label htmlFor="">No of Latest Listings in Home Page</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-5">
                            <ListCount name="latest_list" max="6" value={data.latest_list} onHandleChange={onHandleChange}   />
                        </div>
                    </div>

                    <div className="form-group mb-0 row">
                        <div className="col-sm-7">
                          
                        </div>
                        <div className="col-sm-5  pt-2">
                           <button disabled={processing} className="btn w-100 btn-primary">Save Settings</button>
                        </div>
                    </div>

                </form>
            </Panel>
        </Authenticated>
    )
}
export default AppSettings