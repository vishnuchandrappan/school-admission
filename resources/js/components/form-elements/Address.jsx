import React, { useContext } from "react";
import { DataContext } from "../services/DataService";
import { Input, Form, Checkbox } from "antd";

const { Item } = Form;
const { TextArea } = Input;

export const Address = () => {
    const {
        permanentAddress,
        setPermanentAddress,
        permanentPin,
        setPermanentPin,
        currentAddress,
        setCurrentAddress,
        currentPin,
        setCurrentPin,
        isAddressSame,
        toggleSameAddress,
    } = useContext(DataContext);

    return (
        <>
            <Item
                name="permanent_address"
                label="Permanent Address"
                rules={[
                    {
                        required: true,
                    },
                ]}
            >
                <TextArea
                    value={permanentAddress}
                    onChange={setPermanentAddress}
                />
            </Item>

            <Item
                name="permanent_pin"
                label="Pin"
                rules={[
                    {
                        required: true,
                    },
                ]}
            >
                <Input
                    value={permanentPin}
                    onChange={setPermanentPin}
                    type="number"
                    placeholder="688582"
                />
            </Item>

            <Item>
                <Checkbox checked={isAddressSame} onChange={toggleSameAddress}>
                    Same as permanent address
                </Checkbox>
            </Item>

            <Item
                name="current_address"
                label="Address to which communications are to be sent"
            >
                <TextArea
                    value={currentAddress}
                    onChange={setCurrentAddress}
                    disabled={isAddressSame}
                />
            </Item>

            <Item name="current_pin" label="Pin">
                <Input
                    value={currentPin}
                    onChange={setCurrentPin}
                    disabled={isAddressSame}
                    type="number"
                    placeholder="688582"
                />
            </Item>
        </>
    );
};
