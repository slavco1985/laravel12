import React, { useCallback, useState } from 'react';
import User from '@/Layouts/User';
import UserMenu from '@/Layouts/UserMenu';
import Path from './Shared/Path';
import Input from '@/Components/Input';
import { useForm, Link} from '@inertiajs/react';
import { router } from '@inertiajs/react';
import Cropper from 'react-easy-crop'
import Swal from 'sweetalert2';


const ProfileImage = (props) =>{
    const { data, setData, post, processing, errors, reset, clearErrors } = useForm({
        image: '',
    });

    const [image, setImage] = useState(props.image);
    const [crop, setCrop] = useState({ x: 0, y: 0 })
    const [zoom, setZoom] = useState(1)
    const [cropearea, setcropeArea] = useState([]);

    const onCropComplete = useCallback((croppedArea, croppedAreaPixels) => {
        setcropeArea(croppedAreaPixels);
    }, [])

    const fileHandler = (event) =>{
        setData(event.target.name, event.target.files[0]);
    }

    const uploadImage = (e) =>{
        e.preventDefault();
        post(route(`upload-profile-image`),{
            preserveState: (page) => Object.keys(page.props.errors).length,
        });
    }

    const saveImage = () =>{
        let arr = {'crop' : cropearea}
        router.post(route('crop-profile-image', arr))
    }


    return (
        <User>
           <Path title="User Profile" />
                <div className="container-fluid user-container">
                        <div className="container">
                            <div className="row">
                                <div className="col-md-3">
                                    <UserMenu user={props.auth.user} />
                                </div>
                                
                                <div className="col-md-9">
                                    <div className="row">
                                        <div className="col-md-10 mx-auto">
                                            <div className="card shadow mb-5">
                                                <div className="card-header p-3">
                                                  <h4 className='fs-6 mb-0'> Change Profile Image</h4> 
                                                </div>
                                                <div className="card-body ">
                                                    <div className="profile-pic row">
                                                    <div className="col-md-10 mx-auto">
                                                        <form onSubmit={uploadImage}>
                                                            <div className="row mb-3 mt-2">
                                                                <div className="col-md-8">
                                                                    <Input type="file" name="image" className={`mb-0 ${errors.image && 'inerror'}`} handleChange={fileHandler} />
                                                                    {errors.image &&  <div className="smart-valid">{errors.image}</div> }
                                                                </div>
                                                                <div className="col-md-4">
                                                                    <button disabled={processing} className='btn w-100 btn-primary'>Upload Image</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <div className="col-md-8 mx-auto">
                                                        {
                                                            (image != '/storage/business/default.png') && 
                                                            <div className="row">
                                                                <div className="com-md-5 crope-cover">
                                                                    <div className="crop-container">
                                                                            <Cropper image={image}  crop={crop} zoom={zoom}
                                                                            onCropChange={setCrop} cropSize={{width:250, height: 250 }}
                                                                            onCropComplete={onCropComplete}
                                                                            onZoomChange={setZoom}
                                                                            />
                                                                    </div>
                                                                </div>
                                                            
                                                               
                                                            </div>
                                                            }
                                                        </div>
                                                        <div className="row">
                                                            <div className="col-md-8 mt-3 ">
                                                                        <div className="controls">
                                                                            <input  type="range"  value={zoom}
                                                                            min={1}  max={3} step={0.1}  aria-labelledby="Zoom"
                                                                            onChange={(e) => {
                                                                                setZoom(e.target.value)
                                                                            }}
                                                                            className="zoom-range"
                                                                            />
                                                                            </div>
                                                                    </div>
                                                                    <div className="col-md-4 mt-3 ">
                                                                            <button onClick={saveImage} className="btn w-100 btn-primary">Save and Continue</button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                       
                                                    </div>
                                                    
                                                </div>
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
export default ProfileImage